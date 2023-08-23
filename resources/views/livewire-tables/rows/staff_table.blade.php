<x-livewire-tables::bs5.table.cell>
    <div class="d-flex align-items-center">
        <div class="me-5">
            <img src="{{ $row->profile_image }}" alt="" width="50" height="50" class="rounded-circle object-cover">
        </div>
        <div class="d-flex justify-content-start flex-column">
            <span class="text-muted fw-bold text-muted d-block fs-7">{{ $row->first_name }} {{ $row->last_name }}</span>
            <span class="text-muted text-muted d-block fs-7">{{ $row->email }} </span>
        </div>
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {!! !empty($row->roles[0]) ? $row->roles[0]->display_name : 'N/A' !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm d-flex justify-content-start cursor-pointer">
        <input type="checkbox" name="status" class="form-check-input user-active cursor-pointer"
               wire:change="updateStatus({{$row->status}},{{$row->id}})" value="{{$row->status}}"
                {{ (($row->status)=="1") ? 'checked' : ''}}>
        <span class="custom-switch-indicator"></span>
    </label>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'custom-width-album']">
    <div class="d-flex justify-content-start">
    
        <a href="{{route('staff.edit',$row['id'])}}" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{__('messages.common.edit')}}"
           class="btn px-0 text-primary fs-3 edit-btn" data-id="{{$row->id}}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="javascript:void(0)" data-id="{{$row['id']}}" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.delete') }}"
           class="btn px-2 text-danger fs-3 delete-staff-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>
