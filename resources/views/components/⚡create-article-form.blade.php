<?php

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Jobs\ResizeImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\GoogleVisionLabelImage;


new class extends Component
{
    
    use WithFileUploads;
    
    #[Validate('required|min:5')]
    public $title;
    #[Validate('required|min:10')]
    public $description;
    #[Validate('required|numeric')]
    public $price;
    #[Validate('required')]
    public $category;
    public $article;
    
    public $images = [];
    public $temporary_images;
    
    public function updatedTemporaryImages()
    {
        $this->validate([
        'temporary_images.*' => 'image|max:1024',
        'temporary_images' => 'max:6'
        ]);
        
        foreach($this->temporary_images as $image){
            $this->images[] = $image;
        }
        
        $this->temporary_images = []; 
    }
    
    public function removeImage($key)
    {
        if (array_key_exists($key, $this->images)){
            unset($this->images[$key]);
            $this->images = array_values($this->images);
        }
    }
    


public function save()
{
    $this->validate();
    $this->article = Article::create([
        'title' => $this->title,
        'description' => $this->description,
        'price' => $this->price,
        'category_id' => $this->category,
        'user_id' => Auth::id()
    ]);
    
    if (count($this->images) > 0) {
    foreach ($this->images as $image) {
        $newFileName = "articles/{$this->article->id}";
        $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);
       
        RemoveFaces::withChain([
            new ResizeImage($newImage->path, 600, 600),
            new ResizeImage($newImage->path, 300, 300),
            new GoogleVisionSafeSearch($newImage->id),
            new GoogleVisionLabelImage($newImage->id)
        ])->dispatch($newImage->id);
    }
    File::deleteDirectory(storage_path('/app/livewire-tmp'));
}

    session()->flash('success', 'Articolo creato correttamente');
    $this->reset();
}

};
?>

<div>
    <form class="bg-alt p-5 shadow-sm" style="background-color: var(--color-bg-alt);" wire:submit="save" >
        @if (session()->has('success'))
            <div class="alert alert-success text-center mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-4">
            <div class="col-12">
                <label for="title" class="form-label text-muted small text-uppercase fw-bold">titolo</label>
                <input wire:model.blur="title" type="text" class="form-control py-3" id="title">
                @error('title')
                    <p class="text-danger small mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="col-12 col-md-6">
                <label for="price" class="form-label text-muted small text-uppercase fw-bold">prezzo (€)</label>
                <input wire:model.blur="price" type="number" class="form-control py-3" id="price">
                @error('price')
                    <p class="text-danger small mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="col-12 col-md-6">
                <label for="category" class="form-label text-muted small text-uppercase fw-bold">categoria</label>
                <select id="category" wire:model="category" class="form-select py-3 border-radius-0" style="border-radius: 0 !important;">
                    <option label disabled selected>seleziona...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="text-danger small mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="col-12">
                <label for="description" class="form-label text-muted small text-uppercase fw-bold">descrizione</label>
                <textarea wire:model.blur="description" id="description" rows="5" class="form-control"></textarea>
                @error('description')
                    <p class="text-danger small mt-1">{{$message}}</p>
                @enderror
            </div>
            
            <div class="col-12">
                <label class="form-label text-muted small text-uppercase fw-bold">immagini</label>
                <input type="file" wire:model.live="temporary_images" multiple class="form-control py-3 @error('temporary_images.*') is-invalid @enderror">
                @error('temporary_images.*')
                    <p class="text-danger small mt-1">{{$message}}</p>
                @enderror
            </div>
            
            @if(!empty($images))
                <div class="col-12 mt-4">
                    <p class="text-muted small text-uppercase fw-bold mb-3">anteprima immagini:</p>
                    <div class="row g-3">
                        @foreach ($images as $key => $image)
                            <div class="col-4 col-md-2 text-center">
                                <div class="img-preview mb-2 shadow-sm" style="background-image: url({{$image->temporaryUrl()}}); height: 100px; width: 100%; border-radius: 0 !important;"></div>
                                <button type="button" class="btn btn-danger btn-sm w-100" wire:click="removeImage({{$key}})">rimuovi</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            
            <div class="col-12 mt-5">
                <button type="submit" class="btn btn-primary w-100 py-3 text-uppercase fw-bold">crea articolo</button>
            </div>
        </div>
    </form>
</div>