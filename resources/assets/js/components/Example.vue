<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">contact Names</div>

                    <div class="panel-body">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <td>ID</td>
                            <td>NAME</td>
                            <td>Created At</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="contact in contacts.data">
                            <td>{{contact.id}}</td>
                            <td>{{contact.name}}</td>
                            <td>{{contact.created_at}}</td>
                          </tr>

                            <tr>
                              <td colspan="5">
                                <nav araia-label="Page navigation">
                                  <ul class="pagination">
                                    <li v-show="contacts['prev_page_url']">
                                      <a href="#" @click.prevent="getPreviousPage">
                                      <span>
                                        <span aria-hidden="true">&laquo;</span>
                                      </span>
                                      </a>
                                    </li>
                                    <li v-for="n in contacts['last_page']">
                                      <a href="#" @click.prevent="getPage(n)">
                                      <span >
                                        {{n}}
                                      </span>
                                      </a>
                                    </li>
                                    <li  v-show="contacts['next_page_url']">
                                      <a href="#" @click.prevent="getNextPage">
                                      <span>
                                        <span aria-hidden="true">&raquo;</span>
                                      </span>
                                      </a>
                                    </li>
                                  </ul>
                                </nav>



                              </td>
                            </tr>

                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      data(){
        return {

          contacts: {}

        }
      },
        mounted() {
          this.getContactList();
        },
        methods: {
          getContactList(){
            this.$http.get('/api/contacts').then((response)=>{
              this.$set(this.$data, 'contacts',response.data);
            }, (response)=>{
              console.log(response.data)
            });
          },
          getPage(page){
            this.$http.get('/api/contacts?page='+page).then((response)=>{
              this.$set(this.$data, 'contacts',response.data);
            },(response)=>{

            });
          },

          getPreviousPage(){
            this.$http.get(this.contacts['prev_page_url']).then((response)=>{
                this.$set(this.$data, 'contacts',response.data);
            },(response)=>{

            });
          },
          getNextPage(){
            this.$http.get(this.contacts['next_page_url']).then((response)=>{
                this.$set(this.$data, 'contacts',response.data);
            },(response)=>{

            });
          },
        }
    }
</script>
