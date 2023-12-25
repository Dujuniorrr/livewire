<div>
   <form wire:submit.prevent="store" method="post">
    <input type="file" name="photo" id="photo" wire:model="photo">
    @error('photo')
        {{ $message }}
    @enderror
    <input type="submit" value="Adicionar foto" role="button">
   </form>
</div>
