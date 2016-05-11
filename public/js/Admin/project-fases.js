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

    //activeer datetimepicker voor begindatum
    $('#begin').datetimepicker({
      format: 'YYYY-MM-DD hh:mm:ss'
    });

    //activeer datetimepicker voor einddatum
    $('#einde').datetimepicker({
      format: 'YYYY-MM-DD hh:mm:ss'
    });
  },

  methods: {
    fetchProject: function(id){
      this.$http.get('/json/project/' + id, function(project){
        this.$set('project', project);
      });
    },

    tabFase: function(event){
      faseId = event.target.id;

      this.$http.get('/json/fases/' + faseId, function(currentFase){
        console.log(currentFase);
        this.$set('selectedFase', currentFase[0]);
        this.nieuw = false;
      });

    },

    nieuwProject: function(){
      this.$set('selectedFase', {id:'new'});
    }
  }
});
