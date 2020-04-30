<tr class="word-row">
    <td width="15px">{{$index}}</td>
    <td class="word" width="50px">{{$item->word}}</td>
    <td class="answer">
        <textarea class="form-control" >{{$item->translate}}</textarea>
    </td>
    <td width="10px">
        <button data-id="{{$item->id}}" data-argument="-100" type="button" class="btn btn-dark mark_word">L
        </button>
    </td>
    <td width="10px">
        <button data-id="{{$item->id}}" data-argument="-1" type="button" class="btn btn-info mark_word">+
        </button>
    </td>
    <td width="10px">
        <button data-id="{{$item->id}}" data-argument="1" type="button" class="btn btn-info mark_word">-
        </button>
    </td>
    <td width="10px">
        <button data-id="{{$item->id}}" type="button" class="btn btn-success translate_word">T
        </button>
    </td>
    <td width="10px">
        <button data-id="{{$item->id}}" type="button" class="btn btn-success update_word">U
        </button>
    </td>
    <td width="10px">
        <button data-id="{{$item->id}}" type="button" class="btn btn-outline-danger delete_word">X
        </button>
    </td>
</tr>