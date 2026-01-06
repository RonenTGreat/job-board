@props(['name', 'options' => [], 'allOption' => true, 'value' => null])

<div>
    @if ($allOption)
    <label for="{{$name}}" class="mb-1 flex items-center">
        <input type="radio" name="{{$name}}" value="" @checked(!old($name, $value)) />
        <span class="ml-2">All</span>
    </label>
    @endif

    @foreach ($options as $option)
    <label for="{{$name}}" class="mb-1 flex items-center">
        <input type="radio" name="{{$name}}" value="{{ $option }}" @checked($option === old($name, $value)) />
        <span class="ml-2">{{ Str::ucfirst($option) }}</span>
    </label>
    @endforeach

    @error($name)
        <div class="mt-1 text-xs text-red-500">
            {{ $message }}
        </div>
    @enderror
</div>