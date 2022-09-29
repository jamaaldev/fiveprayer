import { LocationCity, SearchTownCityState } from '../features/search/searchTownCity';
import { emptySplitApi } from './emptySplitApi'


export const customLocationApi = emptySplitApi.injectEndpoints({
    endpoints:(builder) =>({
      
        getLocation: builder.query<LocationCity[],string>({
            query:(methods) => ({ url: `fp/v1/${methods}`, method: 'GET',headers:{
                'X-WP-Nonce': prayerData?.nonce,
            }}),
            
                        providesTags:[{ type: "locationTag"}]
        }),
        insertLocation: builder.mutation<LocationCity,SearchTownCityState>({
            query:({ locationChecked, ...put }) => ({ url: `fp/v1/fp_location`, method: 'POST', body: put,headers:{
                'X-WP-Nonce': prayerData?.nonce,
            } }),
            invalidatesTags: [{ type: 'locationTag'}],
        }),
        updateLocation: builder.mutation<LocationCity[],SearchTownCityState>({
            query:({ locationChecked, ...put }) => ({ url: `fp/v1/fp_location`, method: 'PUT', body: put,headers:{
                'X-WP-Nonce': prayerData?.nonce,
            } }),
            invalidatesTags: [{ type: 'locationTag'}],
        }),
        deleteLocation: builder.mutation<LocationCity[],SearchTownCityState>({
            query:({ locationChecked, ...put }) => ({ url: `fp/v1/fp_location`, method: 'DELETE', body: put,headers:{
                'X-WP-Nonce': prayerData?.nonce,
            } }),
            invalidatesTags: [{ type: 'locationTag'}],
        }),
       
    }),
    overrideExisting: false,
})

// Export hooks for usage in functional components, which are
// auto-generated based on the defined endpoints
export const {useGetLocationQuery,useUpdateLocationMutation,useInsertLocationMutation,useDeleteLocationMutation} = customLocationApi;