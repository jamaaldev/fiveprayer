// Need to use the React-specific entry point to import createApi
import {  SearchTownCityState } from '../features/search/searchTownCity';
import { emptySplitApi } from './emptySplitApi'

export const prayerTimeTableApi = emptySplitApi.injectEndpoints({
    endpoints:(builder) =>({
        getPrayerTimeTable: builder.query({
            query:(methods) => ({ url: `fp/v1/${methods}`, method: 'GET',headers:{
                'X-WP-Nonce': prayerData?.nonce,
            }}),
            providesTags:[{ type: "prayerTimeTableTag"}]
        }),
        updatePrayerTimeTable: builder.mutation<void,SearchTownCityState>({
            query:({ monthChecked, ...put }) => ({ url: `fp/v1/fp_prayertimetable`, method: 'POST', body: put,headers:{
                'X-WP-Nonce': prayerData?.nonce,
            } }),
            invalidatesTags: [{ type: 'prayerTimeTableTag'}],
        }),
        
    }),
    overrideExisting: false,
})

// Export hooks for usage in functional components, which are
// auto-generated based on the defined endpoints
export const {useGetPrayerTimeTableQuery,useUpdatePrayerTimeTableMutation} = prayerTimeTableApi;