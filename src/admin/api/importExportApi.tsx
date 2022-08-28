import { emptySplitApi } from './emptySplitApi'


export const importExport = emptySplitApi.injectEndpoints({
    endpoints:(builder) =>({
      
        exportToCSV: builder.query({
            query:(methods) => ({ url: `fp/v1/${methods}`, method: 'GET',headers:{
                'X-WP-Nonce': prayerData?.nonce,
            }}),
            
                        providesTags:[{ type: "importExportTag"}]
        }),
        importToJSON: builder.mutation({
            query:(methods, ...put) => ({ url: `fp/v1/${methods}`, method: 'POST', body: put,headers:{
                'X-WP-Nonce': prayerData?.nonce,
            } }),
            invalidatesTags: [{ type: 'importExportTag'}],
        }),
    }),
    overrideExisting: false,
})

// Export hooks for usage in functional components, which are
// auto-generated based on the defined endpoints
export const {useExportToCSVQuery,useImportToJSONMutation} = importExport;