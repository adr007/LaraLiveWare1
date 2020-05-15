<div>
   @if(session()->has('message'))
      <div class="alert alert-success">
         {!! session('message') !!}
      </div>
   @endif

   @if($statusUpdate)
      <livewire:contact-update></livewire:contact-update>
   @else
      <livewire:contact-create></livewire:contact-create>
   @endif
   <hr>
   <table class="table">
   		<thead class="thead-dark">
   			<tr>
   				<th scope="col">#</th>
   				<th scope="col">Name</th>
   				<th scope="col">Phone</th>
   				<th scope="col"></th>
   			</tr>
   		</thead>
   		<tbody>
   			@foreach($data as $contact)
   			<tr>
   				<td scope="row">{{ $loop->iteration }}</td>
   				<td>{{ $contact->name }}</td>
   				<td>{{ $contact->phone }}</td>
   				<td>
   					<button wire:click="getContact({{ $contact->id }})" class="btn btn-sm btn-info">Edit</button>
   					<button wire:click="destroy({{ $contact->id }})" class="btn btn-sm btn-danger">Hapus</button>
   				</td>
   			</tr>
   			@endforeach
   		</tbody>
   </table>

   {{ $data->links() }}
</div>
