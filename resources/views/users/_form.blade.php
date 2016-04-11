<div class="form-group @if($errors->has('name')) has-error @endif">
    <label for="name-field">Name</label>
    <input type="text" id="name-field" name="name" class="form-control" value="{{ $user->name }}"/>
    @if($errors->has("name"))
        <span class="help-block">{{ $errors->first("name") }}</span>
    @endif
</div>
<div class="form-group @if($errors->has('email')) has-error @endif">
    <label for="email-field">Email</label>
    <input type="text" id="email-field" name="email" class="form-control" value="{{ $user->email }}"/>
    @if($errors->has("email"))
        <span class="help-block">{{ $errors->first("email") }}</span>
    @endif
</div>
<div class="form-group @if($errors->has('password')) has-error @endif">
    <label for="password-field">Password</label>
    <input
            type="text"
            id="password-field"
            name="password"
            class="form-control"
            @if(isset($temp_password))value="{{ $temp_password }}" @endif
    >
    @if($errors->has("password"))
        <span class="help-block">{{ $errors->first("password") }}</span>
    @endif
    <div class="help-block">If you leave this blank it will not change the password</div>
</div>
<div class="form-group @if($errors->has('api_token')) has-error @endif">
    <label for="api_token-field">Api_token</label>
    <input type="text" id="api_token-field" name="api_token" class="form-control" value="{{ $user->api_token }}" disabled/>
    @if($errors->has("api_token"))
        <span class="help-block">{{ $errors->first("api_token") }}</span>
    @endif
</div>
<div class="form-group">
    <label for="update_token">Update/Create API Token:
        <input class="form-control" type="checkbox" name="update_token">
    </label>
    <div class="help-block">If you want to create or update the api_token just check this. Else no changes will happen</div>
</div>