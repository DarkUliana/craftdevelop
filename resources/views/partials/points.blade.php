@foreach($pastPoints as $point)
    <div class="progress-bar__item {{ $loop->last?'is-active':'' }}">
        <button type="button" data-filter=".{{ str_replace(' ', '_', $point->translate('en')->name) }}" class="progress-bar__btn  {{ $loop->last?'is-checked':'' }}"></button>
        <span class="progress-bar__event">{{ $point->translate($locale)->name }}</span>
        <span class="progress-bar__date">{{ $point->date->localeMonth }} <br> {{ $point->date->year }}</span>
    </div>
@endforeach
@foreach($futurePoints as $point)
    <div class="progress-bar__item">
        <button type="button" data-filter=".{{ str_replace(' ', '_', $point->translate('en')->name) }}" class="progress-bar__btn"></button>
        <span class="progress-bar__event">{{ $point->translate($locale)->name }}</span>
        <span class="progress-bar__date">{{ $point->date->localeMonth }} <br> {{ $point->date->year }}</span>
    </div>
@endforeach