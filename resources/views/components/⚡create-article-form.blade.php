<?php

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    #[Validate('required|min:5')]
    public $title;
    #[Validate('required|min:10')]
    public $description;
    #[Validate('required|numeric')]
    public $price;
    #[Validate('required')]
    public $category;
    public $article;
    
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
        
        $this->reset();
        
        session()->flash('success', 'Articolo creato con successo');
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
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-dark">Crea</button>
        </div>
    </form>
</div>