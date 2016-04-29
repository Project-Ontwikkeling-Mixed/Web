new Vue({
  el: '#project-page',

  ready: function(){
    var id = $('#project-page').attr('data-id');
    this.fetchProject(id);
  },

  methods: {
    fetchProject: function(id){
      this.$http.get('/json/project/' + id, function(project){
        console.log(project);
        this.$set('project', project);
      })
    }
  }
})
