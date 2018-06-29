@foreach($pastPoints->merge($futurePoints) as $point)
    @foreach($point->cards as $card)
        <div class="grid-item {{ str_replace(' ', '_', $point->name) }} {{ $card->done?'done':'new' }}">
            <div class="card">
                <div class="card__header">
                    <span class="card__header-text">{{ $card->done?'done':'new' }}</span>
                </div>
                <div class="card__body">
                    <h4 class="card__body-title">{{ $card->translate($locale)->title }}</h4>
                    <p class="card__body-text">{{ $card->translate($locale)->text }}</p>
                </div>
            </div>
        </div>
    @endforeach
@endforeach