<template>
  <div class="card card-default">
    <div class="card-header">Business List</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table selectable" id="dataTable" width="100%">
            <thead>
              <tr>
                <th width="15%">Name</th>
                <th width="25%">Adress</th>
                <th width="5%">Locale</th>
                <th width="10%">Limit</th>
                <th width="5%">Rates</th>
                <th width="5%">Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import $ from "jquery";
import "datatables.net-bs4";
import BusinessService from '../../services/business.service';
export default
{
  name: 'Business',
  mounted: function() {
    this.getList();
  },
  methods: {
    getList: function() {
      BusinessService.list().then(response => {
        $("#dataTable").DataTable({
          data: response.data,
          columns: [
            {
              data: "name"
            },
            {
              data: "address"
            },
            {
              data: "locale_name"
            },
            {
              data: "limit"
            },
            {
              data: "rates"
            },
            {
              data: "id",
              render: (data) => `<button type="button" onclick="window.open(\'/business/${data}\', \'_self\')" class="btn btn-sm btn-primary">detail</button>`
            }
          ],
          lengthMenu: [2, 10, 25, 50, 75, 100],
          language: {
            paginate: {
              previous: "&lt;",
              next: "&gt;"
            }
          }
        });
      }, error => {
        console((error.response && error.response.data && error.response.data.message) || error.message || error.toString());
      });
    }
  }
}
</script>
