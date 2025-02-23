<div>
   <form wire:submit.prevent="store">
   		<div class="form-group">
   			<div class="form-row">
   				<div class="col">
   					<input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" name="" id="" placeholder="Name">
   					@error('name')
   						<span class="invalid-feedback"><strong>{{ $message }}</strong></span>
   					@enderror
   				</div>
   				<div class="col">
   					<input wire:model="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="" id="" placeholder="Phone">
   					@error('phone')
   						<span class="invalid-feedback"><strong>{{ $message }}</strong></span>
   					@enderror
   				</div>
   			</div>
   		</div>
   		<button type="submit" class="btn btn-sm btn-primary">Submit</button>
   </form>
</div>
