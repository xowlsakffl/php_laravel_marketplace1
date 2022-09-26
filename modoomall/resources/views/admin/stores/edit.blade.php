<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('스토어 수정') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('admin.stores.update', ['sdx' => $store->sdx])}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <x-input-label for="store_email" :value="__('스토어 이메일')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="store_email" required autofocus  value="{{$store->store_email}}"/>
                            @error('store_email')
                                <x-alert level="info" message="{{$message}}" />
                            @enderror  
                        </div>
                        <div class="form-group">
                            <x-input-label for="store_name" :value="__('스토어명')" />
                            <x-text-input class="block mt-1 w-full" type="text" name="store_name" required autofocus  value="{{$store->store_name}}"/>
                            @error('store_name')
                                <x-alert level="info" message="{{$message}}" />
                            @enderror  
                        </div>
                        <div class="form-group">
                            <x-input-label for="store_tel" :value="__('스토어 전화번호')" />
                            <x-text-input class="block mt-1 w-full" type="text" name="store_tel" required autofocus  value="{{$store->store_tel}}"/>
                            @error('store_tel')
                                <x-alert level="info" message="{{$message}}" />
                            @enderror  
                        </div>
                        <div class="form-group">
                            <x-primary-button class="ml-3" type="submit">
                                {{ __('수정하기') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
