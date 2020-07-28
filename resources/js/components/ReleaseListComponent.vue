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
import EventBus from './../event-bus';

export default {
  data() {
    return {
      releases: []
    }
  },
	async created() {
	  await this.getReleases();
	},
  mounted () {
    const addNewReleaseFtn = this.addNewRelease;

    EventBus.$on('ADDED_RELEASE', function (payLoad) {
      addNewReleaseFtn(payLoad);
    });
  },
  methods: {
    addNewRelease(newRelease) {
      newRelease['date'] = new Date(newRelease['date']);
      let newReleaseTimestamp = newRelease['date'].getTime();

      console.log('R', this.releases);

      for (let index in this.releases) {
        const currentRelease = this.releases[index];

        if (currentRelease['date']) {
          const releaseTimestamp = currentRelease['date'].getTime();
          console.log('index', index, ' =============== ');
          console.log('newReleaseTimestamp', newReleaseTimestamp);
          console.log('releaseTimestamp - ', releaseTimestamp);

          if (releaseTimestamp > newReleaseTimestamp) {
            this.releases.splice(index, 0, newRelease);
            break;
          }
        }
      }
      console.log('payload 2', newRelease, this.releases);
    },
    addReleases(releases) {
      const newReleases = [];

      for (let release of releases) {
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
        const response = await axios.get('/api/releases/ordered');

        if (response.data) {
        	this.addReleases(response.data);
        }
      } catch (error) {
        console.log('Error', error);
      }
    },
    async confirmDeletePopup(id) {
      const doDelete = await this.$bvModal.msgBoxConfirm(
      	'Are you sure you want to delete?',
      	{
          title: 'Please Confirm',
          size: 'sm',
          buttonSize: 'sm',
          okVariant: 'danger',
          okTitle: 'YES',
          cancelTitle: 'NO',
          footerClass: 'p-2',
          hideHeaderClose: false,
          centered: true
        }
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
