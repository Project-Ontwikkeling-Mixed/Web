new Vue({
  el: '#welkom-projects',

  ready: function(){
    this.fetchProjects();
  },

  methods: {
    fetchProjects: function(id){
      this.$http.get('/json/project/all', function(project){
        this.$set('projects', project);
      });
    },
  }
});
