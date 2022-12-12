<div class="hero min-h-screen bg-base-200 p-3">
    <div class="card flex-shrink-0 w-full max-w-md shadow-2xl bg-base-100">
        <div class="card-body">
            <h2 class="card-title text-3xl font-mono ">Sign-Up</h2>
            <form {{ $attributes }}>
                @csrf
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="text" placeholder="Email" class="input input-bordered" name="email"
                        value="{{ old('email') }}" />
                    @error('email')
                        <small class="text-red-600 p-1">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" placeholder="Username" class="input input-bordered" name="username"
                        value="{{ old('username') }}" />
                    @error('username')
                        <small class="text-red-600 p-1">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" placeholder="Password" class="input input-bordered" name="password" />
                    @error('password')
                        <small class="text-red-600 p-1">{{ $message }}</small>
                    @enderror
                    <label class="label">
                        <a href="{{ route('login.form') }}" class="label-text-alt link link-hover">Already have
                            an account? Login</a>
                    </label>
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
