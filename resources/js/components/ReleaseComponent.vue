<template>
	<b-container id="app-releases">
	  <b-row cols="3" align-v="start">
	    <b-col v-for="(release, index) in releases"
					:key="index">
				<b-card
					:header="release.name"
					class="text-center"
					header-bg-variant="secondary"
					header-text-variant="white">
				  <b-card-text>{{ release.date | moment("dddd, MMMM Do YYYY") }}</b-card-text>
				  <b-link
				  	href="#"
				  	class="card-link"
				  	@click="confirmDeletePopup(release.id)"
				  >
						Delete
					</b-link>
				</b-card>
	    </b-col>
	  </b-row>
	</b-container>
</template>

<script>
export default {
  data() {
    return {
      releases: []
    }
  },
	async created() {
	  await this.getReleases();
	},
  methods: {
  	addReleases(releases) {
  		const newReleases = [];

  		for (let release of releases) {
  			//const dateText = new Date(release['date']);

  			newReleases.push({
  				id: release['id'],
  				name: release['name'],
  				date: new Date(release['date'])
  			});
  		}
  		this.releases = newReleases;
  	},
    async getReleases() {
      try {
        const response = await axios.get('/api/releases');

        if (response.data) {
        	this.addReleases(response.data);
        }
      } catch (error) {
        console.log('Error', error);
      }
    },
    async confirmDeletePopup(id) {
      const doDelete = await this.$bvModal.msgBoxConfirm(
      	'Are you sure you want to delete?'
      );

      if (doDelete === true) {
      	await this.deleteRelease(id);
      }
    },
		async deleteRelease(id) {
      try {
        const response = await axios.delete(`/api/releases/${id}`);

        if (response.status == 200) {
        	for (let index in this.releases) {
        		const release = this.releases[index];

        		if (id == release['id']) {
        			this.releases.splice(index, 1);
        		}
        	}
        }
      } catch (error) {
        console.log('Error', error);
      }
    }
  }
}
</script>
