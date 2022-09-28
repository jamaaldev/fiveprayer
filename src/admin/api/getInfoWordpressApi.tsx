import { emptySplitApi } from './emptySplitApi'


export const getInfoWordpress = emptySplitApi.injectEndpoints({
    endpoints:(builder) =>({
      
        getBlogInfo: builder.query({
            query:(methods) => ({ url: `fp/v1/${methods.router}`, method: 'PUT', body: methods.info ,headers:{
                'X-WP-Nonce': prayerData?.nonce
                
               
            }}),
            
                        providesTags:[{ type: "getInofWordpressTag"}]
        }),
     
    }),
    overrideExisting: false,
})

// Export hooks for usage in functional components, which are
// auto-generated based on the defined endpoints
export const {useGetBlogInfoQuery} = getInfoWordpress;