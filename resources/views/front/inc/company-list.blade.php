<div class="company-list">
    @foreach($companies as $company)
        <div class="company-item">
            <img src="{{ strpos($company['listing_cover_image'], 'cover_images') === false ? asset('storage/cover_images/' . $company['listing_cover_image']) : asset('storage/' . $company['listing_cover_image']) }}" alt="{{ $company['name'] }} logo" class="company-logo">
            <span class="badge badge-secondary">{{$badge}}</span>
            <div class="company-name"><a href="{{ route('listing', ['listing' => $company['listurl']]) }}">{{ $company['listing_name'] }}</a></div>
            <div class="company-details"> 
            @if ($company['listing_phone'])
                 {{$company['listing_phone']}}
            @else
            {{$company['listing_landline']}}
            @endif</div>
        </div>
    @endforeach
</div>
