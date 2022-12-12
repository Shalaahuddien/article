<div class="hero min-h-screen bg-base-200">
    <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <div class="card-body">
            <h2 class="card-title text-3xl font-mono ">Sign-In</h2>
            {{ $slot }}
            <form {{ $attributes }}>
                @csrf
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" placeholder="Username" class="input input-bordered" name="username" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" placeholder="password" class="input input-bordered" name="password" />
                    <label class="label">
                        <a href="{{ route('register.form') }}" class="label-text-alt link link-hover">Does'nt have
                            account? Register</a>
                    </label>
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
