<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'd-flex']">
    <div class="d-flex align-items-center">
        <img src="{{ $row->post_image }}" class="float-start ms-3 width-custom">
        <a href="{{ route('detailPage',$row->slug) }}"
           class="mb-0 ps-2 lh-15 text-decoration-none {{ $row->status != 0 ? '' : 'pe-none' }} {{ $row->visibility != 0 ? '' : 'pe-none' }}"
           target="_blank"> {!!  $row->title !!} </a>
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {!! $row->category->name !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->type_name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ \Carbon\Carbon::parse($row->created_at)->isoFormat('Do MMM, YYYY')}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="action-btn d-flex option align-items-center">
        <div class="dropdown">
            <button class="btn btn-light btn-sm dropdown-toggle hide-arrow" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                {{__('messages.common.select_an_option')}}
            </button>
            <ul class="dropdown-menu min-width-220" aria-labelledby="dropdownMenuButton1">
                <li>
                    <a href="{{route('posts.edit', $row['id'])}}" class="dropdown-item edit-btn px-3 py-1 text-decoration-none">
                        {{__('messages.common.edit')}}
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item px-3 py-1 text-decoration-none" wire:click="updateFeatured({{$row['id']}})">
                        @if($row->featured)
                            {{__('messages.post.remove_to_featured')}}
                        @else
                            {{__('messages.post.add_to_featured')}}
                        @endif
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item px-3 py-1 text-decoration-none" wire:click="updateHeadline({{$row['id']}})">
                        @if($row->show_on_headline)
                            {{__('messages.post.remove_on_headline')}}
                        @else
                            {{__('messages.post.add_on_headline')}}
                        @endif
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item px-3 py-1 text-decoration-none" wire:click="updateBreaking({{$row['id']}})">
                        @if($row->breaking)
                            {{__('messages.post.remove_to_breaking')}}
                        @else
                            {{__('messages.post.add_to_breaking')}}
                        @endif
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item px-3 py-1 text-decoration-none" wire:click="updateSlider({{$row['id']}})">
                        @if($row->slider)
                            {{__('messages.post.remove_to_slider')}}
                        @else
                            {{__('messages.post.add_to_slider')}}
                        @endif
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item px-3 py-1 text-decoration-none" wire:click="updateRecommended({{$row['id']}})">
                        @if($row->recommended)
                            {{__('messages.post.remove_to_recommended')}}
                        @else
                            {{__('messages.post.add_to_recommended')}}
                        @endif
                    </a>
                </li>
            </ul>
        </div>
        <a href="javascript:void(0)" data-id="{{$row['id']}}" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.delete') }}"
           class="btn px-2 text-danger fs-3 delete-posts-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>

</x-livewire-tables::bs5.table.cell>
