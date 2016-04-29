new Vue({
  el: '#project-page',

  data: {
    project: '',
    selectedFase: ''
  },

  ready: function(){
    var id = $('#project-page').attr('data-id');
    this.fetchProject(id);
  },

  methods: {
    fetchProject: function(id){
      this.$http.get('/json/project/' + id, function(project){
        this.$set('project', project);
      })
    },

    tabFase: function(event){
      faseId = event.target.id;

      project = this.$data.project;

      this.$set('selectedFase', project.fases[faseId - 1]);
    }
  }
})
