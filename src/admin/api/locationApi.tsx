import { LocationCity, SearchTownCityState } from '../features/search/searchTownCity';
import { emptySplitApi } from './emptySplitApi'


export const locationApi = emptySplitApi.injectEndpoints({
    endpoints:(builder) =>({
      
        getLocation: builder.query<LocationCity[],string>({
            query:(methods) => `fp/v1/${methods}`,
            providesTags:[{ type: "locationTag"}]
        }),
        insertLocation: builder.mutation<LocationCity,SearchTownCityState>({
            query:({ locationChecked, ...put }) => ({ url: `fp/v1/fp_location`, method: 'POST', body: put }),
            invalidatesTags: [{ type: 'locationTag'}],
        }),
        updateLocation: builder.mutation<LocationCity[],SearchTownCityState>({
            query:({ locationChecked, ...put }) => ({ url: `fp/v1/fp_location`, method: 'PUT', body: put }),
            invalidatesTags: [{ type: 'locationTag'}],
        }),
        deleteLocation: builder.mutation<LocationCity[],SearchTownCityState>({
            query:({ locationChecked, ...put }) => ({ url: `fp/v1/fp_location`, method: 'DELETE', body: put }),
            invalidatesTags: [{ type: 'locationTag'}],
        }),
       
    }),
    overrideExisting: false,
})

// Export hooks for usage in functional components, which are
// auto-generated based on the defined endpoints
export const {useGetLocationQuery,useUpdateLocationMutation,useInsertLocationMutation,useDeleteLocationMutation} = locationApi;