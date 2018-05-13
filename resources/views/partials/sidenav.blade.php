<div class="col-sm-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">İşlemler</h3>
        </div>
        <div class="panel-body" style="padding: 0px;">
            <div class="list-group" style="margin: 0px;">
                @role('admin')
                    <a href="{{ route('user.list') }}" class="list-group-item">Kullanıcı Listesi</a>
                @endrole
                <a href="{{ route('project.list') }}" class="list-group-item">Proje Listesi</a>    
            </div>
        </div>
    </div>
</div>

