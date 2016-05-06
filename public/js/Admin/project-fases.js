new Vue({
  el: '#project-page',

  data: function(){
    return{
      nieuw: true,
      selectedFase: 'new'
    };
  },

  ready: function(){
    var id = $('#project-page').attr('data-id');
    //zet de id eventjes op nieuw zodat het een create formulier is
    this.$set('selectedFase', {id: 'new'});
    this.fetchProject(id);
  },

  methods: {
    fetchProject: function(id){
      this.$http.get('/json/project/' + id, function(project){
        this.$set('project', project);
      });
    },

    tabFase: function(event){
      faseId = event.target.id;

      this.nieuw = false;
      project = this.$data.project;

      this.$set('selectedFase', project.fases[faseId - 1]);
    },

    nieuwProject: function(){
      this.$set('selectedFase', {id:'new'});
    }
  }
});
