<x-app-layout>
    <x-slot name="header">
        {{$album->title}} Album
    </x-slot>
    <div class="container mx-auto m-4 p-4 bg-white shadow-md rounded-lg">
        <h2 style="color: red">Sorry! The Album is not empty, So you have two option :</h2>

        <div class="flex justify-center">
            <a href="{{route('album.moveallpictures',$album->id)}}" class="py-2 px-4 bg-green-500 hover:bg-green-700 rounded-lg mr-2">Move All Pictures</a>
            <form method="POST" action="{{route('album.deleteallpictures',$album->id)}}">
             @csrf
             @method('DELETE')
             <x-button class="bg-red-500 hover:bg-red-700">Delete All Pictures</x-button> 
           </form>
        </div>
    </div>
</x-app-layout>