@foreach($pastPoints as $point)
    <div class="progress-bar__item {{ $loop->last?'is-active':'' }}">
        <button type="button" data-filter=".{{ str_replace(' ', '_', $point->name) }}" class="progress-bar__btn"></button>
        <span class="progress-bar__event">{{ $point->name }}</span>
        <span class="progress-bar__date">{{ $point->date->localeMonth }} <br> {{ $point->date->year }}</span>
    </div>
@endforeach
@foreach($futurePoints as $point)
    <div class="progress-bar__item">
        <button type="button" data-filter=".{{ str_replace(' ', '_', $point->name) }}" class="progress-bar__btn"></button>
        <span class="progress-bar__event">{{ $point->name }}</span>
        <span class="progress-bar__date">{{ $point->date->localeMonth }} <br> {{ $point->date->year }}</span>
    </div>
@endforeach