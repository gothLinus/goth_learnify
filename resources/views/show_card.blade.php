<x-layout>
    <div>
        <p>{{$card->title}}</p>
    </div>
    <div>
        <p>{{$card->description}}</p>
    </div>
    <div>
        <p>{{$card->time}}</p>
    </div>
    <div>
        @foreach($card->files as $file)
            <img src="{{asset("storage/".$file->path)}}" alt="..."/>
        @endforeach
    </div>
    <form method="post" action="/card/delete/{{$card->id}}">
        @csrf
        @method('delete')
        <button type="submit"
                class="text-red-500">
            <i class="fa-solid fa-trash"></i>
            Delete Card
        </button>
    </form>
    <a wire:navigate.hover href="/card/edit/{{$card->id}}"
       class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Edit Card
    </a>
</x-layout>
