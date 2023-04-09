<x-app-layout>

    <div class="flex flex-row justify-center mt-20">

        <div class="">

 <div class="block max-w-md rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700">
  <form action="{{route ('reservation.store')}}" method="POST">
    @csrf
    <div class="flex justify-center gap-4">

      <div class="relative mb-6 " data-te-input-wrapper-init>
        <select name="user" id="users-select">
          <option value="">Utilisateurs sans réservation</option>

          @foreach ($users as $user)
            <option value="{{$user->id}}">{{ $user->name}}</option>
          @endforeach
          
        </select>
      </div>

      <div class="relative mb-6" data-te-input-wrapper-init>
        <select name="place" id="place-select">
          <option value="">Place libre</option>

          @foreach ($places as $place)
             <option value="{{$place->id}}">{{ $place->numero}}</option>
          @endforeach
          
        </select>
      
      </div>
        
    </div>

    <div class="flex justify-center gap-4">

      <div class="relative mb-6" data-te-input-wrapper-init>
        <input
          type="date"
          name="date_debut"
          id="exampleInput123"
          aria-describedby="emailHelp123"
          placeholder="" value="{{ $date->toDateString()}}" />
      </div>
  
      <div class="relative mb-6" data-te-input-wrapper-init>
        <input
          type="date"
          name="date_fin"
          id="exampleInput123"
          aria-describedby="emailHelp123"
          placeholder="" value="{{ $dateF->toDateString()}}" />
      </div>

    </div>

    

    <div class="flex justify-center">
        <button 
            class="flex bg-black hover:bg-gray-700 text-white font-bold py-1 px-3 rounded-full justify-center"
            type="submit"
            data-te-ripple-init
            data-te-ripple-color="light">
            Creer une reservation
        </button>
      </div>
  </form>
</div>

</x-app-layout>