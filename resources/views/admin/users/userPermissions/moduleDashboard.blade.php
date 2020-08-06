<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="panel panel-body">
        <div class="header">
            <h2 class="tittle"><i class="fa fa-globe"></i>  Dashboard  </h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="form-check">
            <p><label for="dashboard"><input type="checkbox" value="true" name="dashboard"  @if(kvfj($users->permissions, 'dashboard')) checked @endif> Puede ver el dashboard.</label></p>
          </div>
          <div class="form-check">
            <p><label for="dashboardStatsUsers"><input type="checkbox" value="true" name="dashboardStatsUsers"  @if(kvfj($users->permissions, 'dashboardStatsUsers')) checked @endif> Puede ver estadísticas de acceso.</label></p>
          </div>
          <div class="form-check">
            <p><label for="dashboardTraffic"><input type="checkbox" value="true" name="dashboardTraffic"  @if(kvfj($users->permissions, 'dashboardTraffic')) checked @endif> Puede ver el tráfico del sitio.</label></p>
          </div>
          <div class="form-check">
            <p><label for="dashboardStatsSells"><input type="checkbox" value="true" name="dashboardStatsSells"  @if(kvfj($users->permissions, 'dashboardStatsSells')) checked @endif> Puede ver estadísticas de ventas.</label></p>
          </div>
        </div>

    </div>
</div>