@extends('layouts.app')
@section('content')
<div class="container">
<div class="background">
</div>
<div class="row gutters">
	<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
		<div class="card h-100">
			<div class="card-body">
				<div class="account-settings">
					<div class="user-profile">
						<h5 class="user-name">{{Auth::user()->name}}</h5>
						<h6 class="user-email">{{Auth::user()->email}}</h6>
					</div>
					<div class="about">
						<h5 class="mb-2 text-primary">About</h5>
						<p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
		<div class="card h-100">
			<div class="card-body">
                <form method="POST" action="/update">
                @csrf
                @method('PUT')
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary">Personal Details</h6>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="fullName">Full Name</label>
							<input type="text" class="form-control" name="name" id="fullName" placeholder="Enter full name" required>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="eMail">Email</label>
							<input type="email" class="form-control" name="email" id="eMail" placeholder="Enter email ID" required>
						</div>
					</div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="phone">Password</label>
							<input type="password" class="form-control" name="old-password" id="phone" placeholder="Old Password" required>
						</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="phone">Password</label>
							<input type="password" class="form-control" name="new-password" id="phone" placeholder="New Password" required>
						</div>
					</div>
					
				</div>
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="text-right">
							<input type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
						</div>
</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
