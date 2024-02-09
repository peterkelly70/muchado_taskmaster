<div x-data="{ view: 'login' }">
    <div x-show="view === 'login'">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <fieldset>
                <legend>Login</legend>
                <div class="user-box">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required="">
                </div>
                <div class="user-box" x-data="{ show: false }">
                    <label for="password">Password</label>
                    <input :type="show ? 'text' : 'password'" id="password" name="password" required="">
                    <button type="button" @click="show = !show" class="toggle-password">
                        <span x-show="!show">👁️</span>
                        <span x-show="show">🚫</span>
                    </button>
                </div>
                <button type="submit">Login</button> 
                <button type="button" @click="view = 'register'">Register</button>
            </fieldset>
        </form>
    </div>

    <div x-show="view === 'register'">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <fieldset>
                <legend>Register</legend>
                <div class="user-box">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required="">
                </div>
                <div class="user-box">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required="">
                </div>
               
                <div class="user-box" x-data="{ show: false }">
                    <label for="password">Password</label>
                    <input :type="show ? 'text' : 'password'" id="password" name="password" required="">
                    <button type="button" @click="show = !show" class="toggle-password">
                        <span x-show="!show">👁️</span>
                        <span x-show="show">🚫</span>
                    </button>
                </div>

                <div class="user-box" x-data="{ show: false }">
                    <label for="password_confirmation">Confirm Password</label>
                    <input :type="show ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" required="">
                    <button type="button" @click="show = !show" class="toggle-password">
                        <span x-show="!show">👁️</span>
                        <span x-show="show">🚫</span>
                    </button>
                </div>
                <button type="submit">Confirm</button>
                <button type="button" @click="view = 'login'">Cancel</button>
            </fieldset>
        </form>
    </div>
</div>

<div class="error" x-data="{ showError: false }" x-show="showError">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p x-show="showError = true">{{ $error }}</p>
        @endforeach
    @endif
</div>
