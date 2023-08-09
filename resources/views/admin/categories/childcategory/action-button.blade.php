<div class="text-center btnAlign">
    <a href="{{ route('childcategory.edit',encrypt($row->id))}}" title="Edit">
        <i class="fas fa-edit"></i>
    </a>
    {{-- <a href="{{ route('childcategory.show',encrypt($row->id)) }}" title="Show">
        <i class="fas fa-eye ml-1"></i>
    </a> --}}
    {{-- <form action="{{ route('childcategory.destroy', encrypt($row->id)) }}" method="POST">
        @csrf
        @method('DELETE')
        <a href="javascript:void(0)" id="delete_farm"> <i class="fas fa-trash ml-1 buttonColor"></i></a>
    </form> --}}
</div>
<script>
    confirmAlert('#delete_farm', "If you delete this Farm, it cannot be reverted")
</script>