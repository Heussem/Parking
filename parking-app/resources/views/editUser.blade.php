<x-app-layout>

    <div class="flex flex-row justify-center mt-20">

        <div class="">

 <div class="block max-w-md rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700">
  <form action="{{route ('user.update', $user[0]->id)}}" method="post">
    @method('PUT')
    @csrf
    <div class="flex justify-center gap-4">

      <div class="relative mb-6" data-te-input-wrapper-init>
        <input
          type="text"
          name="name"
          id="exampleInput123"
          aria-describedby="emailHelp123"
          placeholder="{{$user[0]->name}}" />
      </div>

      <div class="relative mb-6" data-te-input-wrapper-init>
        <input
          type="email"
          name="email"
          id="exampleInput124"
          aria-describedby="emailHelp124"
          placeholder="{{$user[0]->email}}" />
      </div>
      
    </div>

    <div class="relative mb-6 flex justify-center" data-te-input-wrapper-init>
        <input
          type="password"
          name="password"
          id="password"
          aria-describedby="password"
          placeholder="new password" />
    </div>

    <div>
      <input type="checkbox" name="active" id="active" @checked(false)> Actived
    </div>

    <div class="flex justify-center">
        <button 
            class="flex bg-black hover:bg-gray-700 text-white font-bold py-1 px-3 rounded-full justify-center"
            type="submit"
            data-te-ripple-init
            data-te-ripple-color="light">
            Update
        </button>
    </div>
  </form>
</div>

</x-app-layout>