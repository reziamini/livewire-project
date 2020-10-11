<div>

    <div class="alert alert-success d-none" id="alert"></div>

    <form action="" wire:submit.prevent="save()">
        @csrf
        <div class="form-group" >
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" wire:model="name">
            @error('name')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" wire:model="email">
            @error('email')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" id="password" name="password" class="form-control" wire:model="password">
            @error('password')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-5">
            <input type="submit" value="Register" class="btn btn-primary btn-block">
        </div>

    </form>

    <script>
        let alert = document.getElementById('alert');
        window.addEventListener('show-message', function (e) {
            alert.classList.remove('d-none');
            let message = e.detail.message;
            alert.innerText = message;
            setTimeout(function () {
                Livewire.emit('registered');
            }, 3000);
        });
    </script>
</div>
