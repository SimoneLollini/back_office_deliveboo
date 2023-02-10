<div class="modal fade" id="delete-{{ $plate->id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId-{{ $plate->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="delete-{{ $plate->id }}">Stai per eliminare
                    <strong>definitivamente</strong> un dato
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Stai per eliminare per sempre un elemento, sei sicuro di voler continuare? Se lo fai, non sarà più
                possibile recuperare i dati.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="post">
                    @csrf

                    @method ('delete')

                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>
