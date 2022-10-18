// this is a feature that i am not done with it,
class MasjidJamaah {

constructor(times){
this.times = times;
}

FajrJamah(){
    let hourprayer =   1 * (this.times.fajr + "").split(/[^0-9.+-]/)[0]; 
    let minprayer =   1 * (this.times.fajr + "").split(/[^0-9.+-]/)[1]; 
    const lastmin = String(minprayer).slice(-1); // 👉️ '7'
    const lastsecondmin = String(minprayer).slice(-2,1); // 👉️ '7'
    if(((parseInt(lastsecondmin) === 0 ) && ( parseInt(lastmin) === 0 ))){
        this.times.fajr_masjid_jamaah = hourprayer + ':' + (minprayer +16) % 60
      }
  
    if( minprayer >0 && minprayer <=8 ){
        this.times.fajr_masjid_jamaah = hourprayer + ':' + 16;
      }
    
      if( minprayer >=8 && minprayer <=16 ){
        this.times.fajr_masjid_jamaah = hourprayer + ':' + 24;
      }
      if( minprayer >=16 && minprayer <=24 ){
        this.times.fajr_masjid_jamaah = hourprayer + ':' + 32;
      }
      if( minprayer >=24 && minprayer <=32 ){
        this.times.fajr_masjid_jamaah = hourprayer + ':' + 40;
      }
      if( minprayer >=32 && minprayer <=40 ){
        this.times.fajr_masjid_jamaah = hourprayer + ':' + 48;
      }
      if( minprayer >=40 && minprayer <=48 ){
        this.times.fajr_masjid_jamaah = hourprayer + ':' + 54;
      }
      if( minprayer >=48 && minprayer <=52 ){
        this.times.fajr_masjid_jamaah = hourprayer + ':' + 58;
      }
      if( minprayer >=52 && minprayer <=59 ){
        this.times.fajr_masjid_jamaah = hourprayer + 1+':' + 8;
      }
    
   /*  if( minprayer >=0 && minprayer <=15 ){
        this.times.masjid = hourprayer + ':' + 10;
      }
    
      if( minprayer >=15 && minprayer <=32 ){
        this.times.masjid = hourprayer + ':' + 15;
      }
      if( minprayer >=32 && minprayer <=45 ){
        this.times.masjid = hourprayer + ':' + 20;
      }
      if( minprayer >=45 && minprayer <=59 ){
        this.times.masjid = hourprayer + ':' + 25;
      }
      if( minprayer >=59 && minprayer <=7 ){
        this.times.masjid = hourprayer + ':' + 30;
      }
      if( minprayer == 59){
        this.times.masjid = hourprayer + 1 + ':' + ( minprayer - 49);
      } */
}


}

export default MasjidJamaah;