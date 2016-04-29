new Vue({
  el: '#admin-menu',

  ready: function(){
    this.fetchProjects();
  },

  methods: {
    fetchProjects: function(){
      this.$http.get('/json/project/all', function(projects){
        this.$set('projects', projects);
      });
    }
  }
});
