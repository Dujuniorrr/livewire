<div>

    @livewire('user.upload-photo')
    <hr>

    <form wire:submit.prevent="store" method="post">
        <input type="text" name="content" id="content" wire:model.live="content">
        @error('content')
            {{ $message }}
        @enderror
        <input type="submit" value="Criar tweet" role="button">
    </form>

    <hr>

    Show tweets

    @if ($tweets)
        @foreach ($tweets as $tweet)
            <p>
              @if ($tweet->user->photo)
              <img  src="/public/storage/{{$tweet->user->photo}}}"  alt="Imagem de {{ $tweet->user->name }}" width="20">

              @endif
            {{ $tweet->user->name }}  - {{ $tweet->content }} ( {{ $tweet->likes->count() }} curtidas )
            </p>

            @if ($tweet->likesByUser->count() > 0)
                <button wire:click="unlike({{$tweet}})" >Descurtir</button>
            @else
                <button wire:click="like({{$tweet}})" >Curtir</button>
            @endif
        @endforeach
    @endif

    {{ $tweets->links() }}

</div>
