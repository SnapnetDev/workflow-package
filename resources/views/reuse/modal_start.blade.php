<div id="{{ isset($id)? $id : uniqid() }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-info modal-{{ isset($size)? $size : 'md' }}">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title">{{ isset($title)? $title : 'Modal Title' }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
