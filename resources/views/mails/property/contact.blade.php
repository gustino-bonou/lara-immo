<x-mail::message>
# Nouvelle demande de contact

Une nouvelle demnade de contact a été fait pour le bien <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property'=> $property])}}">{{ $property->title }}</a>.

-Prénom : {{ $data['firstname'] }}
-Nom : {{ $data['lastname'] }}
-Téléphone : {{ $data['phone'] }}


**message:**<br>

{{ $data['message'] }}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
