import * as React from "react";
import { useGetBlogInfoQuery } from "../../../api/getInfoWordpressApi";

function Welcome() {
  const infoWP = {
    router: 'fp_infoblog',
    info:{'Site_title':'name','Site_tagline':'description'}
  }
  const { data } = useGetBlogInfoQuery(infoWP);
  console.log("🚀 ~ file: Welcome.tsx ~ line 6 ~ Welcome ~ data", data)

  return (
    <>
      <div id="Dashboard" className="tabcontent">
        <p className="pheadline">Welcome</p>
        <p>Welcome is the capital city of England.</p>
      </div>
    </>
  );
}

export default Welcome;
