<?php

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;



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
    
    if(count($this->images) > 0) {
        foreach($this->images as $image) {
            $this->article->images()->create(['path' => $image->store('images','public')]);
        }
    }
    
    session()->flash('success', 'Articolo creato con successo');
    $this->reset();
    
}

};
?>

<div>
    {{-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama --}}
    <form class="bg-body-tertiary shadow rounded p-5 my-5" wire:submit="save" >
        @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input wire:model.blur="title" type="text" class="form-control" id="title" wire:model="title">
            @error('title')
            <p class="text-danger fst-italic">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione:</label>
            <textarea wire:model.blur="description" id="description" cols="30" rows="10" class="form-control" wire:model="description"></textarea>
            @error('description')
            <p class="text-danger fst-italic">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo:</label>
            <input wire:model.blur="price" type="number" class="form-control" id="price" wire:model="price">
            @error('price')
            <p class="text-danger fst-italic">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <select id="category" wire:model="category" class="form-control">
                <option label disabled>Seleziona una categoria</option>
                @foreach ($categories as $category)
                <option wire:model.blur="cateogory" value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
            <p class="text-danger fst-italic">{{$message}}</p>
            @enderror
        </div>
        
        {{-- gestione immagini --}}
        
        <div class="mb-3">
            <input type="file" wire:model.live="temporary_images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
            @error('temporary_images.*')
            <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
            @error('temporary_images')
            <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
        </div>
        
        @if(!empty($images))
        <div class="row">
            <div class="col-12">
                <p>Photo preview:</p>
                <div class="row border-4 border-success rounded shadow py-4">
                    @foreach ($images as $key => $image)
                    <div class="col d-flex flex-column align-items-center my-3">
                        <div class="img-preview mx-auto shadow rounded" style="background-image : url({{$image->temporaryUrl()}});"></div>
                        <button type="button" class="btn mt-1 btn-danger" wire:click="removeImage({{$key}})">X</button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        
        
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-dark">Crea</button>
        </div>
    </form>
</div>