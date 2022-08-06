// Need to use the React-specific entry point to import createApi
import {  SearchTownCityState } from '../features/search/searchTownCity';
import { emptySplitApi } from './emptySplitApi'

export const prayerTimeTableApi = emptySplitApi.injectEndpoints({
    endpoints:(builder) =>({
        getPrayerTimeTable: builder.query({
            query:(methods) => `fp/v1/${methods}`,
            providesTags:[{ type: "prayerTimeTableTag"}]
        }),
        updatePrayerTimeTable: builder.mutation<void,SearchTownCityState>({
            query:({ monthChecked, ...put }) => ({ url: `fp/v1/fp_prayertimetable`, method: 'POST', body: put }),
            invalidatesTags: [{ type: 'prayerTimeTableTag'}],
        }),
        
    }),
    overrideExisting: false,
})

// Export hooks for usage in functional components, which are
// auto-generated based on the defined endpoints
export const {useGetPrayerTimeTableQuery,useUpdatePrayerTimeTableMutation} = prayerTimeTableApi;