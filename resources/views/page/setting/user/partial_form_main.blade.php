@php
/* --Insert setting property form-- */
$form_id = 'idFormInput';
/** If slug is edit*/
if ($sts == 'Edit'){
	extract($user);
}

@endphp
<form id="{{ $form_id }}" action="{{ route('User.store') }}" class="form-horizontal">
@method('POST')
@csrf
{{-- hidden params --}}
<input type="hidden" name="id" id="idid" placeholder="idid" value="{{ isset($id) ? $id : '' }}">
<input type="hidden" name="sts" id="idsts" placeholder="idsts" value="{{ isset($sts) ? $sts : '' }}">

<div class="row">
	<div class="col-md-12">

		<div class="form-group row">
			<label for="idname" class="col-md-2 col-form-label">Name</label>
			<div class="col-sm-4 col-xs-12">
				<div class="errInput" id="idErrname"></div>
				<input type="text" class="form-control" name="name" id="idname" placeholder="Name" value="{{ isset($name) ? $name : '' }}" autofocus>
			</div>	
		</div>

		<div class="form-group row">
			<label for="idusername" class="col-md-2 col-form-label">Username</label>
			<div class="col-sm-4 col-xs-12">
				<div class="errInput" id="idErrusername"></div>
				<input type="text" class="form-control" name="username" id="idusername" placeholder="Username" value="{{ isset($username) ? $username : '' }}">
			</div>	
		</div>

		<div class="form-group row">
			<label for="idemail" class="col-md-2 col-form-label">Email</label>
			<div class="col-sm-4 col-xs-12">
				<div class="errInput" id="idErremail"></div>
				<input type="email" class="form-control" name="email" id="idemail" placeholder="Email" value="{{ isset($email) ? $email : '' }}">
			</div>	
		</div>

		<div class="form-group row">
			<label for="idrole_id" class="col-md-2 col-form-label">Role</label>
			<div class="col-sm-4 col-xs-12">
				{{Form::select('role_id', isset($opsiRole) ? $opsiRole : array(), isset($role_id) ? $role_id:null, ['class' => 'form-control form-control-sm select2', 'id' => 'idrole_id'])}}
			</div>	
		</div>

		<div class="form-group row">
			<label for="idpassword" class="col-md-2 col-form-label">Password</label>
			<div class="col-sm-4 col-xs-12">
				<div class="errInput" id="idErrpassword"></div>
				<input type="password" class="form-control" name="password" id="idpassword" placeholder="Password" value="">
			</div>	
		</div>

		<div class="form-group row">
			<label for="idpassword_confirmation" class="col-md-2 col-form-label">Password Confirmation</label>
			<div class="col-sm-4 col-xs-12">
				<div class="errInput" id="idErrpassword_confirmation"></div>
				<input type="password" class="form-control" name="password_confirmation" id="idpassword_confirmation" placeholder="Password Confirmation" value="">
			</div>	
		</div>

		<div class="form-group row">
			<div class="col-sm-4 offset-md-2 col-xs-12">
				<button type="reset" name="btnReset" class="btn btn-default btn-flat">
					<i class="fas fa-sync-alt"></i> Reset
				</button>
			<button type="submit" name="btnSubmit" id="idbtnSubmit{{ $form_id }}" onclick="submitData('{{ $form_id }}')" class="btn btn-info">
					<i class="fas fa-save"></i> Save
				</button>
			</div>
		</div>
	
	</div>
</div>

</form>