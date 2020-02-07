using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class MoveCamera : MonoBehaviour
{
    // Start is called before the first frame update
    void Start()
    {
        // moves the camera along the z-axis
        GetComponent<Rigidbody>().velocity = new Vector3(0, 0, 2);
    }

    // Update is called once per frame
    void Update()
    {
        
    }
}
