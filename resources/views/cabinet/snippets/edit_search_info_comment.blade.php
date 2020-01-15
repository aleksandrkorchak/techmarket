<div class="col-xs-12 no-padding">
    <hr>
    <form action="{{ route('store.edit.search', ['search_id' => $search->id]) }}" method="post">
        @csrf
        @method('PUT');
        <p><textarea class="text-content-textarea" name="comment" cols="40" rows="5">{{ $search->comment }}</textarea>
        </p>
        <button type="submit" class="btn-mi btn-mi-safe">Сохранить</button>
    </form>
    <hr>
</div>