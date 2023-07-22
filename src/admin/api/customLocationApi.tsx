import {
	LocationCity,
	SearchTownCityState,
	ListCityTown,
	ListCityLocation,
} from '../features/search/searchTownCity';
import { emptySplitApi } from './emptySplitApi';
declare const prayerData;

export const customLocationApi = emptySplitApi.injectEndpoints( {
	endpoints: ( builder ) => ( {
		getLocation: builder.query< LocationCity[], string >( {
			query: ( methods ) => ( {
				url: `fp/v1/${ methods }`,
				method: 'GET',
				headers: {
					'X-WP-Nonce': prayerData?.nonce,
				},
			} ),

			providesTags: [ { type: 'locationTag' } ],
		} ),
		insertLocation: builder.mutation< ListCityLocation, ListCityLocation >(
			{
				query: ( insertQuery ) => ( {
					url: `fp/v1/fp_location`,
					method: 'POST',
					body: insertQuery,
					headers: {
						'X-WP-Nonce': prayerData?.nonce,
					},
				} ),
				invalidatesTags: [ { type: 'locationTag' } ],
			}
		),
		updateLocation: builder.mutation< ListCityTown, ListCityTown >( {
			query: ( updateQuery ) => ( {
				url: `fp/v1/fp_location`,
				method: 'POST',
				body: updateQuery,
				headers: {
					'X-WP-Nonce': prayerData?.nonce,
					'X-HTTP-Method-Override': 'PUT',
				},
			} ),
			invalidatesTags: [ { type: 'locationTag' } ],
		} ),
		deleteLocation: builder.mutation< ListCityTown[], SearchTownCityState >(
			{
				query: ( idQuery ) => ( {
					url: `fp/v1/fp_location`,
					method: 'POST',
					body: { id: idQuery },
					headers: {
						'X-WP-Nonce': prayerData?.nonce,
						'X-HTTP-Method-Override': 'DELETE',
					},
				} ),
				invalidatesTags: [ { type: 'locationTag' } ],
			}
		),
	} ),
	overrideExisting: false,
} );

// Export hooks for usage in functional components, which are
// auto-generated based on the defined endpoints
export const {
	useGetLocationQuery,
	useUpdateLocationMutation,
	useInsertLocationMutation,
	useDeleteLocationMutation,
} = customLocationApi;
